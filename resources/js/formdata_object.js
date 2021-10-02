const send_post = document.querySelector('#send_post');
const form_post = document.querySelector('#form_post');
// Permet de vider tous les erreurs du formulaire quand on clique sur submit
const error_texts = document.querySelectorAll('.error_text');

if (form_post) {

    const url = form_post.getAttribute('action');
    
    form_post.addEventListener('submit', function(e) {
        e.preventDefault();

        // On vide les champs d'erreur
        for(let error_text of error_texts) {
            error_text.textContent = ""
        }
        

        let myFom = e.target;
        let fd = new FormData(myFom)

        const myFileElt = document.querySelector('#image')
        // On vérifie si le fichier existe
        if (myFileElt.files[0]) {
            let myFile = myFileElt.files[0];
            fd.append('image', myFile);
        }
    
        // console.log(myFile)
        
        // console.log("elelelelel", myFile)
        // fd.append("test", "123")
        // for(let key of fd.keys()) {
        // console.log(key, fd.get(key))
        // }
        
        let req = new Request(url, {
            body: fd,
            method: 'POST',
        });

        fetch(req, {
            // headers: {
            //     'Content-Type': 'application/json',
            //     // 'X-CSRF-TOKEN': token
            // },

            // method: 'post',
            // body: JSON.stringify(Array.from(fd), "\t", 2)

        }).then(response => {

            response.json().then(data => {
                if (data.status == 0) {

                    for (const property in data.error) {
                        // console.log(`${property}: ${data.error[property]}`);
                        console.log(data.error[property][0])
                        // document.querySelector('span.' + property)
                        document.querySelector('span.' + property + '_error').textContent = data.error[property][0]
                    }
                } else {
                    const message_success = document.querySelector('#message_success');

                    message_success.style.display = "block";

                    setTimeout(function(){ 
                        message_success.style.display = "none";
                    }, 3000);

                    form_post.reset();
                    console.log("je suis",data.resultat)
                }
                
            })

        }).catch(error => {
            console.log(error)
        })
    })
}


// if (send_post) {
    
//     send_post.addEventListener('click', function() {

//         //On recherche le csrf token
//         const token = document.querySelector('meta[name="csrf-token"]').content;

//         // Permet d'afficher un message d'erreur sur le formulaire
//         const post_alert_infos = document.querySelector('#post_alert_infos');

//         const titleElt = document.querySelector('input[id="title"]');
//         const bodyElt = document.querySelector('textarea[id="post"]');

//         const url = window.projet_url + "chris/posts";

       

//         let title = titleElt.value;
//         let body = bodyElt.value;

//         if (title && body) {
//             let fd = new FormData();
//             fd.append("myTitle", title);
//             fd.append("myBody", body);

//             for(let key of fd.keys()) {
//                 console.log(key, fd.get(key))
//             }

//             let req = new Request(url, {
//                 body: fd,
//                 method: 'POST',
//             })

//             console.log(req)
//             fetch(req, {
//                 headers: {
//                     'Content-Type': 'application/json',
//                     'X-CSRF-TOKEN': token
//                 },
    
//                 // method: 'post',
//                 // body: JSON.stringify(Array.from(fd), "\t", 2)

//             }).then(response => {
    
//                 response.json().then(data => {
                    
//                     console.log("je suis", data.resultat)
//                 })

//             }).catch(error => {
//                 console.log(error)
//             })


//         } else {
//             post_alert_infos.style.display = "block";
//             post_alert_infos.textContent = "Les champs titre et article sont obligatoires";
//         }

        
//     })
// }
