const PostRegister = (uri , dataUser) => {
    let baseUrl = `http://localhost:8000/api/auth`;

    return new Promise((resolve , reject ) => {
        fetch(`${baseUrl}/${uri}` , {
            
            method : "POST",
            headers : {
                "Content-Type" : "application/json",
            },

            body : JSON.stringify(dataUser)
        })
        .then( (response) => response.json())
        .then( (responseJson) => {
            resolve(responseJson);
        })
        .catch( error => {
           reject(error);
        })
    });
}

export default PostRegister;

