import mongoose from "mongoose";
import Inventory from "../roblox/inventory.js";
import ItemPage from "../models/itempage.js";
mongoose.connect('mongodb://localhost/limited');

var itemlist;

function handle() {
    if(!itemlist.length) return;
    var id = itemlist.pop().id;
    if(ItemPage.find({item_id: id}, function(err, model) {
        if(model.length) return handle();

        Inventory.getAssetOwners(id).then((result) => {
            var [owners, pages] = result;
            new ItemPage({
                item_id: id,
                pages: pages
            }).save((err) => { 
                if(err) throw err; 
                console.log('Saved page number for ' + id.toString());
            });
            handle();
        }).catch((err) => {
            throw err;
        });
    }));
}

Inventory.getLimiteds().then((items) => {
    itemlist = items;
    handle();
});