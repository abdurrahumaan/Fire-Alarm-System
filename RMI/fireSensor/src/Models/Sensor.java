package Models;

import java.io.Serializable;

public class Sensor implements Serializable {

    public int sensor_id;
    public String sensor_name;
    public String sensor_description;
    public int user_id;
    public int smoke_value;
    public int co2_value;

    public Sensor() {
    }

    public Sensor(int sensor_id, String sensor_name, String sensor_description, int user_id, int smoke_value, int co2_value) {
        this.sensor_id = sensor_id;
        this.sensor_name = sensor_name;
        this.sensor_description = sensor_description;
        this.user_id = user_id;
        this.smoke_value = smoke_value;
        this.co2_value = co2_value;
    }

    public int getSensor_id() {
        return sensor_id;
    }

    public void setSensor_id(int sensor_id) {
        this.sensor_id = sensor_id;
    }

    public String getSensor_name() {
        return sensor_name;
    }

    public void setSensor_name(String sensor_name) {
        this.sensor_name = sensor_name;
    }

    public String getSensor_description() {
        return sensor_description;
    }

    public void setSensor_description(String sensor_description) {
        this.sensor_description = sensor_description;
    }

    public int getUser_id() {
        return user_id;
    }

    public void setUser_id(int user_id) {
        this.user_id = user_id;
    }

    public int getSmoke_value() {
        return smoke_value;
    }

    public void setSmoke_value(int smoke_value) {
        this.smoke_value = smoke_value;
    }

    public int getCo2_value() {
        return co2_value;
    }

    public void setCo2_value(int co2_value) {
        this.co2_value = co2_value;
    }

    

}
