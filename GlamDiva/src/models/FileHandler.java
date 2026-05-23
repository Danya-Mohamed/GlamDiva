/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package models;
import java.io.*;
import java.util.ArrayList;
import java.util.List;
/**
 *
 * @author janjk
 */
public class FileHandler {
    private static final String USER_FILE = "data/users.txt";
    private static final String ITEM_FILE = "data/fashion_items.txt";

    public static void saveUser(User user) throws IOException {
        BufferedWriter writer = new BufferedWriter(new FileWriter(USER_FILE, true));
        writer.write(user.getUsername() + "," + user.getPassword());
        writer.newLine();
        writer.close();
    }

    public static List<User> loadUsers() throws IOException {
        List<User> users = new ArrayList<>();
        BufferedReader reader = new BufferedReader(new FileReader(USER_FILE));
        String line;
        while ((line = reader.readLine()) != null) {
            String[] parts = line.split(",");
            if (parts.length == 2) {
                users.add(new User(parts[0], parts[1]));
            }
        }
        reader.close();
        return users;
    }

    public static void saveItem(FashionItem item) throws IOException {
        BufferedWriter writer = new BufferedWriter(new FileWriter(ITEM_FILE, true));
        writer.write(item.getId() + "," + item.getName() + "," + item.getCategory() + "," + item.getPrice() + "," + item.getImagePath());
        writer.newLine();
        writer.close();
    }

    public static List<FashionItem> loadItems() throws IOException {
        List<FashionItem> items = new ArrayList<>();
        BufferedReader reader = new BufferedReader(new FileReader(ITEM_FILE));
        String line;
        while ((line = reader.readLine()) != null) {
            String[] parts = line.split(",");
            if (parts.length == 5) {
                int id = Integer.parseInt(parts[0]);
                String name = parts[1];
                String category = parts[2];
                double price = Double.parseDouble(parts[3]);
                String imagePath = parts[4];
                items.add(new FashionItem(id, name, category, price, imagePath));
            }
        }
        reader.close();
        return items;
    }
}
