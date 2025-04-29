
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


//promiseImitator(() => {return 52;}, res => console.log('result is', res), error => console.error('error', error));


//promiseImitator(() => { throw new Error('some error');}, res => console.log('result is', res), error => console.error('error', error));