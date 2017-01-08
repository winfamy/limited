const mongoose  = require('mongoose');
const Schema    = mongoose.Schema;

var ItemLog = new Schema({
    item_id: Number,
    user_id: Number,
    uaid:    Number,
    date:    {
        type: Date,
        default: Date.now
    }
});

module.exports = mongoose.model('ItemLog', ItemLog);