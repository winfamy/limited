import Axios from "axios";
import Inventory from "../roblox/inventory.js";

class Crawler {
    constructor() {
        this.items = [];
        this.owners = {};
        this.reporting = false;
    }

    run() {
        return new Promise((resolve, reject) => {
           Inventory.getLimiteds().then((items) => {
               var done = items.length;
               this.items = items;
               this.items.forEach((item) => {
                   if(item.rap < 10000) return;
                   this.handle(item.id).then(() => {
                        if(!--done)
                            this.report(() => { resolve(); });
                   });
               });
           });
        });
    }

    handle(item_id) {
        return new Promise((resolve, reject) => {
            Inventory.getAssetOwners(item_id).then((owners) => {
                this.owners[item_id] = owners;
                resolve();
            });
        });
    }

    report(cb) {
        for(var id in this.owners) break;
        Axios.post("http://localhost/api/bot/inventory/owners", {
            owners: this.owners[id]
        }).then(() => {
            console.log('Finished request for ' + id.toString());
            delete this.owners[id];
            if(Object.keys(this.owners).length) {
                return this.report(cb);
            }
            return cb();
        }).catch((err) => {});
    }

    start() {
        this.run().then(() => {
            this.start();
        });
    }
}


new Crawler().start();

