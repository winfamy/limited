const mongoose  = require("mongoose");
const Schema    = mongoose.Schema;

var itemPageSchema = new Schema({
    item_id: Number,
    pages:   Number
});

module.exports = mongoose.model('ItemPage', itemPageSchema);