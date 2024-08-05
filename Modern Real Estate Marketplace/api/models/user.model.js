import mongoose from "mongoose"

const userSchema = new mongoose.Schema({
    username: {
        type:String,
        required: true,
        unique: true,
    },
    email: {
        type:String,
        required: true,
        unique: true,
    },
    password: {
        type:String,
        required: true,
    },
    avatar: {
        type: String,
        default: "https://img.freepik.com/premium-vector/man-avatar-profile-round-icon_24640-14044.jpg?w=360"
    },
}, {timestamps: true})

const User = mongoose.model('User', userSchema)

export default User