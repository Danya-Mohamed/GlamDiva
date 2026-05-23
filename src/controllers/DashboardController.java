/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package controllers;
import javafx.fxml.FXML;
import javafx.scene.control.Label;
/**
 *
 * @author janjk
 */
public class DashboardController {
    @FXML
    private Label welcomeLabel;

    public void initialize() {
        welcomeLabel.setText("Welcome to GlamDiva Dashboard!");
    }
}
