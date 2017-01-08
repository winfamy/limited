import Axios from "axios";
import Inventory from "../roblox/invetory.js";

class Crawler {

    constructor() {
        this.requests = 0;
        this.items = [];
        this.owners = [];
        Axios.interceptors.request.use((config) => {
            while(this.requests >= 1000)
                
            return config;
        }, (err) => { return Promise.reject(error); });
        setInterval(this.reset_requests, 60*1000);
    }

    sleep(ms) {
        return(new Promise(function(resolve, reject) {        
            setTimeout(function() { resolve(); }, ms);        
        }));    
    }

    reset_requests() {
        this.requests = 0;
    }

    run() {

    }

    start() {
        this.run().then(() => {
            this.start();
        });
    }
}