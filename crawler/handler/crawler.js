import Axios from "axios";
import Inventory from "../roblox/inventory.js";

class Crawler {
    constructor() {}

    run() {
        return new Promise((resolve, reject) => {
           Inventory.getLimiteds().then((items) => {
               var done = items.length;
               items.forEach((item) => {
                    if(item.rap > 10000) {
                        this.handle(item.id).then(() => {
                            if(!--done) resolve();
                        });
                    }
               });
           });
        });
    }

    handle(item_id) {
        return new Promise((resolve, reject) => {
            Inventory.getAssetOwners(item_id).then((owners) => {
                Axios.post("http://localhost/api/bot/", {
                    owners: owners
                }).then((response) => {
                    console.log(response);
                }).catch((err) => { console.log(err); });
            });
        });
    }

    start() {
        this.run().then(() => {
            this.start();
        });
    }
}


new Crawler().start();

