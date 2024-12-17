const mongoose = require('mongoose');

const productSchema = new mongoose.Schema({
    name: {
        type:String,
        required:[true,"please enter product name"],
        trim:true,
        maxLength:[100,"product name cannot exceed 100 characters"]
    },
    price:{
        type:Number,
        required:true,
        default:0.0  
    },
    description:{
        type:String,
        required:[true,"please enter product description"]
    },
    rating:{
        type:Number,
        default:0
    },
    images:{
        image:{
            type:String,
            required:true   
        }
    },
    category:{

        type:String,
        required:[true,"please enter product catagory"],
        enum:{
            values:[
                
                'Mobile phones',
                'Accessories',
                'Laptops',
                'Headphones',
                'Sports',
                'Electronics',
                'Food',
                'Books',
                'Clothes/Shoes',
                'Beauty/Health',
                'Outdoor',
                'Home'
            ],
            message : "please select correct category"
        }
    },
    seller:{
        type:String,
        required:[true,"please enter product seller "]
    },
    stock:{
        type:Number,
        required:[true,"please enter product stock"],
        maxlength:[20,"product stock cannot exceed"]
    },
    numberOfReviews:{
        type:Number,
        default:0
    },
    reviews:{
        name:{
            type:String,
            required:true
        },
        rating:{
            type:String,
            required:true
        },
        comment:{
            type:String,
            required:true
        } 
    },
    createdAt:{
        type:Date,
        default:Date.now()
    }

})


let schema = mongoose.model('product',productSchema);

module.exports=schema;