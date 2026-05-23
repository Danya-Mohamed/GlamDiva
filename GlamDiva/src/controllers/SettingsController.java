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
public class SettingsController {
    @FXML
    private Label statusLabel;

    public void initialize() {
        statusLabel.setText("Settings loaded successfully");
    }
}
