// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: import.meta.env.VITE_FIREBASE_API_KEY,
  authDomain: "mern-estate-8bd35.firebaseapp.com",
  projectId: "mern-estate-8bd35",
  storageBucket: "mern-estate-8bd35.appspot.com",
  messagingSenderId: "162207915944",
  appId: "1:162207915944:web:8ceda7e72202d234bc079d"
};

// Initialize Firebase
export const app = initializeApp(firebaseConfig);