import './bootstrap';

document.querySelector('#button').onclick = async () => {

    let data = await window.axios.get('/test2');

}

const channel = window.Echo.private('private.test.1');


channel.subscribed(() => {
    console.log('hi mom!');
}).listen('.test', (e) => {
    console.log(e);
});



