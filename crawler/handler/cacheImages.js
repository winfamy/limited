import Inventory from "../roblox/inventory.js";
import Catalog from "../roblox/catalog.js";

import redis from "redis";
const client = redis.createClient();

Inventory.getLimiteds().then((items) => {
    items.forEach((item) => {
        Catalog.getImage(item.id).then((image) => {
            console.log(image);
            client.del(`item.${item.id}`);
            client.set(`image.${item.id}`, image);
        });
    });
});