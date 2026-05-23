/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package controllers;
import javafx.fxml.FXML;
import javafx.scene.control.TextArea;
import models.FashionItem;
import models.FileHandler;

import java.io.IOException;
import java.util.List;
/**
 *
 * @author janjk
 */
public class ViewCollectionController {
     @FXML
    private TextArea itemDisplay;

    public void initialize() {
        try {
            List<FashionItem> items = FileHandler.loadItems();
            StringBuilder display = new StringBuilder();
            for (FashionItem item : items) {
                display.append("ID: ").append(item.getId())
                       .append(", Name: ").append(item.getName())
                       .append(", Category: ").append(item.getCategory())
                       .append(", Price: $").append(item.getPrice())
                       .append("\n");
            }
            itemDisplay.setText(display.toString());
        } catch (IOException e) {
            itemDisplay.setText("Error loading items");
        }
    }
}
