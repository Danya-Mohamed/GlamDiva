/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package models;
import java.util.ArrayList;
import java.util.List;
/**
 *
 * @author janjk
 */
public class CollectionManager {
    private List<FashionItem> itemList;

    public CollectionManager() {
        itemList = new ArrayList<>();
    }

    public void addItem(FashionItem item) {
        itemList.add(item);
    }

    public void removeItem(int id) {
        itemList.removeIf(item -> item.getId() == id);
    }

    public List<FashionItem> getAllItems() {
        return itemList;
    }
}
