/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package models;

/**
 *
 * @author janjk
 */
public class FashionItem {
    private int id;
    private String name;
    private String category;
    private double price;
    private String imagePath;

    public FashionItem(int id, String name, String category, double price, String imagePath) {
        this.id = id;
        this.name = name;
        this.category = category;
        this.price = price;
        this.imagePath = imagePath;
    }

    public int getId() { return id; }
    public String getName() { return name; }
    public String getCategory() { return category; }
    public double getPrice() { return price; }
    public String getImagePath() { return imagePath; }
}
