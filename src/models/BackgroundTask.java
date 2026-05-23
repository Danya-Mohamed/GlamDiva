/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package models;
import javafx.concurrent.Task;
/**
 *
 * @author janjk
 */
public class BackgroundTask extends Task<Void>{
    private String operation;

    public BackgroundTask(String operation) {
        this.operation = operation;
    }

    @Override
    protected Void call() throws Exception {
        if (operation.equals("load")) {
            Thread.sleep(2000); // simulate loading time
            updateMessage("Loading completed");
        }
        return null;
    }
}
