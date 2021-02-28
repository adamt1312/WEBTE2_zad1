let currentPath = '/home/xtrebichalsky/public_html/files/';
const table_container = document.querySelector('#table_container')

var url = '/files/scandir.php';
var formData = new FormData();
formData.append('path', currentPath);

fetch(url, { method: 'POST', body: formData })
    .then((response) => {
        return response.text();
    })
    .then((body)  => {
        table_container.innerHTML = body;
        $('#table').excelTableFilter();
        addClickListeners();
    });

const button = document.querySelector('#submit');

button.addEventListener('click', () => {
    const form = new FormData(document.querySelector('#form'));
    const url = '/files/upload.php'
    const request = new Request(url, {
        method: 'POST',
        body: form
    });

    fetch(request)
        .then(response => response.json())
        .then(data => { console.log(data); })
});


const addClickListeners = () => {
    document.querySelectorAll('.subfolder').forEach(item => {
        item.addEventListener('click', event => {
            formData.append('path', currentPath+item.innerHTML.replace(/\s/g,'')+'/');

                fetch(url, { method: 'POST', body: formData })
                    .then((response) => {
                        return response.text();
                    })
                    .then((body)  => {
                        table_container.innerHTML = '';
                        table_container.innerHTML = body;
                        $('#table').excelTableFilter();
                        addClickListeners();
                    });
            console.log("click")
        })
    })
}



// document.querySelector('.subfolder').addEventListener('click', event => {
//     console.log('click')
// })


