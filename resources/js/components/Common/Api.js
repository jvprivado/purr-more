import axios from "axios";

export default axios.create({
    baseURL: "http://localhost:3000/api",
    headers: {
        "Accept": "application/json",
        "Authorization": `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJXaGlza2FzIiwibmFtZSI6IlB1cnIgTW9yZSIsImFkbWluIjp0cnVlLCJpYXQiOjE2NTE5OTg4OTQsImV4cCI6MTY1MjAwMjQ5NH0.WSrIpDuHOnZtRaY1LChuuLzdg1ciPMYf6buCkZvGr-U`
    }
});
