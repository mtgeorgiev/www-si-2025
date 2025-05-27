
const myTestHandler = event => {

    let elementContents = event.target.innerHTML;

    document.body.appendChild(document.createTextNode(elementContents));
}


const revealSecretAgentData = () => {
    fetch('./file1.php')
        .then(response => response.json())
        .then(secretAgentData  => {
            document.getElementById('secret-agent-name').innerText = secretAgentData.name;
            document.getElementById('secret-agent-age').innerText = secretAgentData.age;
            window.scrollTo(0, document.body.scrollHeight);
        });
}

document.querySelector('form')
        .querySelectorAll('div')
        .forEach(div => {
            div.addEventListener('click', myTestHandler);
        });

document.getElementById('button1').addEventListener('click', revealSecretAgentData);

document.getElementById('form1').addEventListener('submit', event => {
    event.preventDefault();
    let formData = new FormData(event.target);

    fetch('./formHandler.php', {
        method: 'POST',
        body: formData,
    });

});



let promiseImitator = function (method, onSuccess, onFailure) {
    try {
        let res = method.call();
        onSuccess(res);
    } catch (error) {
        onFailure(error);
    }
}

const isLoggedIn = () => {
    fetch('./session.php')
    .then(response => response.json())
    .then(response => {
        console.log(response);
    });
}

const login = () => {
    fetch('./session.php', {method: 'POST', body: JSON.stringify({'username': 'its me mario', 'password': '0000'})})
   .then(response => response.json())
   .then(response => {
       console.log(response);
   });
}

const loggout = () => {
    fetch('./session.php', {method: 'DELETE'})
   .then(response => response.json())
   .then(response => {
       console.log(response);
   });
}

document.getElementById('register')
        .addEventListener('submit', event => {
            event.preventDefault();

            let userData = {
                'username': event.target.querySelector('input[name="username"]').value,
                'password': event.target.querySelector('input[name="password"]').value,
            };
            fetch('./user.php', {method: 'POST', body: JSON.stringify(userData)})
                .then(r=>r.json())
                .then(response => {
                    if (response.error) { // registration failed
                        event.target.querySelector('.error-message').innerText = response.error;
                        event.target.querySelector('.success-message').innerText = '';
                    } else {
                        event.target.querySelector('.error-message').innerText = '';
                        event.target.querySelector('.success-message').innerText = 'Успешна регистрация. Можете да се логнете.';
                    }
                });
        });


//promiseImitator(() => {return 52;}, res => console.log('result is', res), error => console.error('error', error));


//promiseImitator(() => { throw new Error('some error');}, res => console.log('result is', res), error => console.error('error', error));