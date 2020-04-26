package firesensor;

import Models.FetchedAllData;
import Models.Floor;
import Models.Room;
import Models.Sensor;
import Models.User;
import java.rmi.Remote;
import java.rmi.RemoteException;
import java.util.List;
import sun.security.util.PropertyExpander;

public interface RMIInterface extends Remote{
    
    User findUser(User u) throws RemoteException;
    List<User> allUser() throws RemoteException;
    
    Floor findFloor(Floor f) throws RemoteException;
    List<Floor> allFloor() throws RemoteException;
    
    Room findRoom(Room r) throws  RemoteException;
    List<Room> allRoom()throws RemoteException;
    
    Sensor findSensor(Sensor s)throws RemoteException;
    List<Sensor> allSensors() throws RemoteException;
    
    List<FetchedAllData> allFetchData() throws RemoteException;
    
}
