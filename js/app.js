/**
 * Chiamata API al server con XMLHttpRequest
 */
function XmlHttpRequest(method, url){
    return new Promise((resolve, reject) => {
        let xhttp = new XMLHttpRequest();
        xhttp.open(method, url);
        xhttp.onload = function(){
            if(xhttp.readyState === 4 && xhttp.status === 200){
                let response = xhttp.response;
                resolve(JSON.parse(response));
            } else {
                reject({
                    status: xhttp.status,
                    statusText: xhttp.statusText
                });
            }
        };
        xhttp.onerror = function(){
            reject({
                status: '',
                statusText: 'Connessione internet assente oppure il server non è raggiungibile'
            });
        }

        xhttp.send();
    });
}


/**
 * Avviamo la chiamata al server
 */
async function sendRequest(items){
    try{
        let [name, email, age] = items;
        let params = `name=${name}&email=${email}&age=${age}`;
        let response = await XmlHttpRequest('GET', 'http://localhost/corso-boolean-php/php-snacks-b1/Requests/AuthenticatableRequest.php?' + params);
        return response;
    } catch(e){
        console.log(e)
    }
}

document.getElementById('submit').addEventListener('click', async function(event){
    event.preventDefault();
    let message = 'Accesso non eseguito, riprova';
    let name = document.getElementById('name');
    let email = document.getElementById('email');
    let age = document.getElementById('age');
    const result = await sendRequest([name.value, email.value, age.value]);
    console.log(result, typeof result.status)
    if(result.status){
        message = 'Accesso eseguito';
    }

    name.value = '', email.value = '',  age.value = '';

    document.getElementById('message').innerHTML = message;
});

