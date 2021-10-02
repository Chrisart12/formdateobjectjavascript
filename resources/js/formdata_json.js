const send_post = document.querySelector('#send_post');
const form_post = document.querySelector('#form_post');
if (form_post) {
    const url = form_post.getAttribute('action');
    
    form_post.addEventListener('submit', handleForm)

    async function handleForm(e) {

        e.preventDefault();
        let myFom = e.target;
        let fd = new FormData(myFom)

        fd.append("test", "123")
        for(let key of fd.keys()) {
        console.log(key, fd.get(key))
        }
        
        //j'appelle la fonction de conversion en json async
        let json = await convertFdToJson(fd);

        let req = new Request(url, {
            body: json,
            method: 'POST',
        });

        fetch(req, {
            headers: {
                'Content-Type': 'application/json',
                // 'X-CSRF-TOKEN': token
            },

            // method: 'post',
            // body: JSON.stringify(Array.from(fd), "\t", 2)

        }).then(response => {

            response.json().then(data => {
                
                console.log("je suis", data.resultat)
            })

        }).catch(error => {
            console.log(error)
        })
    }
    

    function convertFdToJson(formdata) {
        let obj = {};
        for (let key of formdata.keys()) {
            obj[key] = formdata.get(key);
        }
        return JSON.stringify(obj);
    }
}
