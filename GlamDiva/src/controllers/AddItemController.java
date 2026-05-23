/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package controllers;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import models.FashionItem;
import models.FileHandler;

import java.io.IOException;
import java.util.Random;
/**
 *
 * @author janjk
 */
public class AddItemController {
     @FXML
    private TextField nameField;
    @FXML
    private TextField categoryField;
    @FXML
    private TextField priceField;
    @FXML
    private TextField imagePathField;

    @FXML
    private void addItem(ActionEvent event) {
        try {
            int id = new Random().nextInt(10000);
            String name = nameField.getText();
            String category = categoryField.getText();
            double price = Double.parseDouble(priceField.getText());
            String imagePath = imagePathField.getText();

            FashionItem item = new FashionItem(id, name, category, price, imagePath);
            FileHandler.saveItem(item);
            showAlert("Item added successfully!", Alert.AlertType.INFORMATION);
        } catch (NumberFormatException e) {
            showAlert("Invalid price value", Alert.AlertType.WARNING);
        } catch (IOException e) {
            showAlert("Error saving item", Alert.AlertType.ERROR);
        }
    }

    private void showAlert(String message, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setContentText(message);
        alert.show();
    }
}
