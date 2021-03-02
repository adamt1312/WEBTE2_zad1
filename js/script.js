let currentPath = '/home/xtrebichalsky/public_html/files/';
let currentFolder = '';
const table_container = document.querySelector('#table_container')
var url = '/files/scandir.php';
var formData = new FormData();


const fetchTable = (formData) => {
    fetch(url, { method: 'POST', body: formData })
        .then((response) => {
            return response.text();
        })
        .then((body)  => {
            table_container.innerHTML = '';
            table_container.innerHTML = body;
            $("#table").tablesorter();
            addListenersOnSubfolders();
        });
}


const initTable = () => {
    formData.append('path', currentPath);
    fetchTable(formData);
}

initTable();


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
        .then(data => {
            console.log(data)
            initTable();
            document.querySelector('#form').reset();
        })
});


const addListenersOnSubfolders = () => {
    document.querySelectorAll('.subfolder').forEach(item => {
        item.addEventListener('click', () => {
            if (item.innerHTML === "") {
                if (currentPath === '/home/xtrebichalsky/public_html/files/') {
                    console.log('You are in a root folder /files/, cannot go back!')
                }
                else {
                    currentPath = currentPath.replace(currentFolder+'/','');
                    console.log('Current path is: '+ currentPath);
                    formData.append('path', currentPath);
                    fetchTable(formData);
                }

            }
            else {
                currentFolder = item.innerText;
                currentPath += item.innerText.replace(/\s/g,'') + '/';
                console.log('Current path is: '+ currentPath);
                formData.append('path', currentPath);
                fetchTable(formData);
            }
        })
    })
}


// const addListenersOnDelete = () => {
//     document.querySelectorAll('.bi-trash').forEach(item => {
//         item.addEventListener('click', event => {
//             console.log('Delete file:' + currentPath+item.id)
//             formData.append('path', currentPath+item.innerHTML.replace(/\s/g,'')+'/');
//
//             fetch(url, { method: 'POST', body: formData })
//                 .then((response) => {
//                     return response.text();
//                 })
//                 .then((body)  => {
//                     table_container.innerHTML = '';
//                     table_container.innerHTML = body;
//                     $('#table').excelTableFilter();
//                     addListenersOnSubfolders();
//                 });
//         })
//     })
// }
