import axios from "axios";

 const baseDomain = "https://localhost:1337"; //For Strapi
// const baseURL = `${baseDomain}`; // Incase of /api/v1;
// ALL DEFAULT CONFIGURATION HERE


export default axios.create({
    //baseURL,
    headers: {
        // "Authorization": "Bearer xxxxx"
    }
});