package firesensor;

import Common.httpJson;
import Models.FetchedAllData;
import Models.Floor;
import Models.Room;
import Models.Sensor;
import Models.User;
import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.rmi.Naming;
import java.rmi.RemoteException;
import java.rmi.registry.LocateRegistry;
import java.rmi.registry.Registry;
import java.rmi.server.UnicastRemoteObject;
import java.util.ArrayList;
import java.util.List;
import java.util.function.Predicate;
import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;

public class Server extends UnicastRemoteObject implements RMIInterface {

    private List<User> userList;
    private List<Floor> floorList;
    private List<Room> roomList;
    private List<Sensor> sensorList;
    private List<FetchedAllData> fetchAlDataList;

    public Server() throws RemoteException {
        super();
        initializeData();
    }

    public static void main(String[] args) {
        try {
            Registry reg = LocateRegistry.createRegistry(9999);
            reg.rebind("hi_server", new Server());
            System.err.println("Server ready");
        } catch (Exception e) {
            System.err.println("Server exception: " + e.getMessage());
        }
    }

    private void initializeData() {

        userList = new ArrayList<>();
        floorList = new ArrayList<>();
        roomList = new ArrayList<>();
        sensorList = new ArrayList<>();
        fetchAlDataList = new ArrayList<>();

        serverUpdate();

    }

    public User findUser(User user) throws RemoteException {
        Predicate<User> predicate = x -> x.getEmail().equals(user.getEmail());
        return userList.stream().filter(predicate).findFirst().get();
    }

    @Override
    public List<User> allUser() throws RemoteException {
        return userList;
    }

    @Override
    public Floor findFloor(Floor f) throws RemoteException {
        Predicate<Floor> predicate = x -> x.getNo().equals(f.getId());
        return floorList.stream().filter(predicate).findFirst().get();
    }

    @Override
    public List<Floor> allFloor() throws RemoteException {
        return floorList;
    }

    @Override
    public Room findRoom(Room r) throws RemoteException {
        Predicate<Room> predicate = x -> x.getRoom_id() == r.getRoom_id();
        return roomList.stream().filter(predicate).findFirst().get();
    }

    @Override
    public List<Room> allRoom() throws RemoteException {
        return roomList;
    }

    @Override
    public Sensor findSensor(Sensor s) throws RemoteException {
        Predicate<Sensor> predicate = x -> x.getSensor_id() == s.getSensor_id();
        return sensorList.stream().filter(predicate).findFirst().get();
    }

    @Override
    public List<Sensor> allSensors() throws RemoteException {
        return sensorList;
    }

    @Override
    public List<FetchedAllData> allFetchData() throws RemoteException {
        return fetchAlDataList;
    }

    private void serverUpdate() {
        System.out.println("Server Update Function Execute----------------------");
        Thread thread = new Thread(new Runnable() {

            @Override
            public void run() {
                try {
                    System.out.println("Server Thread Start---------------------");
                    apiRequests();
                    Thread.sleep(5000);
                    serverUpdate();
                } catch (Exception e) {
                    System.out.println("Thread Exception : " + e);
                }

            }
        }
        );

        thread.start();

    }

    private void apiRequests() {
        System.out.println("Send API Requests");
//------Floor JSON
//------------------------------------------------------------------------------
        String floor_response = new httpJson().jsonRequest("http://127.0.0.1:8000/api/allfloors");

        if (floor_response != null) {
            try {
                JSONParser jsonParser = new JSONParser();
                JSONObject responseObj = (JSONObject) jsonParser.parse(floor_response);
                JSONArray array = (JSONArray) responseObj.get("floors");
                floorList.clear();
                for (Object obj : array) {
                    JSONObject jSONObject = (JSONObject) obj;
                    floorList.add(
                            new Floor(
                                    Integer.parseInt(jSONObject.get("id").toString()),
                                    jSONObject.get("no").toString(),
                                    Integer.parseInt(jSONObject.get("user_id").toString())));
                }
                System.out.println("Response from all floors: complete----------");
            } catch (Exception e) {
                System.out.println("Server Exception: " + e);
            }
        }

//------Room JSON  
//------------------------------------------------------------------------------
        String room_response = new httpJson().jsonRequest("http://127.0.0.1:8000/api/allrooms");

        if (room_response != null) {
            try {
                JSONParser jsonParser = new JSONParser();
                JSONObject responseObj = (JSONObject) jsonParser.parse(room_response);
                JSONArray array = (JSONArray) responseObj.get("rooms");
                roomList.clear();
                for (Object obj : array) {
                    JSONObject jSONObject = (JSONObject) obj;
                    roomList.add(
                            new Room(
                                    Integer.parseInt(jSONObject.get("id").toString()),
                                    jSONObject.get("no").toString(),
                                    Integer.parseInt(jSONObject.get("user_id").toString()),
                                    Integer.parseInt(jSONObject.get("floor_id").toString())));
                }
                System.out.println("Response from all rooms: complete-----------");
            } catch (Exception e) {
                System.out.println("Server Exception: " + e);
            }
        }

//------Room JSON  
//------------------------------------------------------------------------------
        String sensor_response = new httpJson().jsonRequest("http://127.0.0.1:8000/api/allsensors");

        if (sensor_response != null) {
            try {
                JSONParser jsonParser = new JSONParser();
                JSONObject responseObj = (JSONObject) jsonParser.parse(sensor_response);
                JSONArray array = (JSONArray) responseObj.get("floors");
                sensorList.clear();
                for (Object obj : array) {
                    JSONObject jSONObject = (JSONObject) obj;
                    sensorList.add(
                            new Sensor(
                                    Integer.parseInt(jSONObject.get("id").toString()),
                                    (jSONObject.get("name") == null) ? "" : jSONObject.get("name").toString(),
                                    (jSONObject.get("detail") == null) ? "" : jSONObject.get("detail").toString(),
                                    Integer.parseInt(jSONObject.get("user_id").toString()),
                                    Integer.parseInt(jSONObject.get("smoke").toString()),
                                    Integer.parseInt(jSONObject.get("co2").toString()))
                    );
                }
                System.out.println("Response from all sensors: complete---------");
            } catch (Exception e) {
                System.out.println("Server Exception: " + e);
            }
        }

//------FetchAllData JSON  
//------------------------------------------------------------------------------
        String fetchAllData_response = new httpJson().jsonRequest("http://127.0.0.1:8000/api/fetchSensors");
        //System.out.println(fetchAllData_response);
        if (fetchAllData_response != null) {
            try {
                JSONParser jsonParser = new JSONParser();
                JSONArray responseObj = (JSONArray) jsonParser.parse(fetchAllData_response);
                fetchAlDataList.clear();
                for (Object obj : responseObj) {
                    JSONObject jSONObject = (JSONObject) obj;
                    fetchAlDataList.add(
                            new FetchedAllData(
                                    Integer.parseInt(jSONObject.get("index").toString()),
                                    jSONObject.get("floor").toString(),
                                    jSONObject.get("sensor").toString(),
                                    jSONObject.get("smoke").toString(),
                                    jSONObject.get("co2").toString(),
                                    jSONObject.get("room").toString(),
                                    jSONObject.get("statusval").toString(),
                                    jSONObject.get("status").toString())
                    );
                }
                System.out.println("Response from all FetchedData: complete---------");
            } catch (Exception e) {
                System.out.println("Server Exception: " + e);
            }
        }
    }

}
