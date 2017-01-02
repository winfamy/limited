import Axios from "axios";
import Inventory from "../roblox/inventory.js";

class Crawler {
    constructor() {}

    run() {
        return new Promise((resolve, reject) => {
           Inventory.getLimiteds().then((items) => {
               var done = items.length;
               items.forEach((item) => {
                   this.handle(item.id).then(() => {
                       if(!--done) resolve();
                   });
               });
           });
        });
    }

    handle(item_id) {
        return new Promise((resolve, reject) => {
            resolve();
        });
    }

    start() {
        this.run().then(() => {
            console.log('yas');
            this.start();
        });
    }
}


new Crawler().start();

console.log('done');

