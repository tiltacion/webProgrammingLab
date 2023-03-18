function updateSelect (string) {
    let options = form.selectSubject.options;
    console.log("wd");
    for (let i = 0; i < options.length; i++) {
        options[i].setAttribute('style', 'display:block;')
        if (!options[i].text.includes(string)) {
            options[i].setAttribute('style', 'display:none;')
        }
        
    }
}


function loadPage() {
    document.getElementById('groupError').style.visibility = 'hidden';
}

function validateAddScheludeForm() {
    let isValidate = true;
    let errordiv = document.getElementById("groupError");
    errordiv.innerHTML = "";

    let groupId = document.forms["form"]["groupNumber"].value;
    

    if (!parseInt(groupId) || groupId < 0) {
        errordiv.style.visibility = 'visible';
        const text = document.createTextNode('Значение поля "Группа" должно быть положительным целым числом!\n');
        errordiv.appendChild(text);
        isValidate = false;
    } 
    
    return isValidate;
}

function setErrorForTextFields(fieldName, element) {
    let errText = 'Поле ' + fieldName + ' должно быть заполнено! ';
    let text = document.createTextNode(errText);
    element.appendChild(text);
    element.appendChild(document.createElement('br'));
}

function validateAddSubjectForm() {
    let isValidate = true;
    let errordiv = document.getElementById("groupError");
    errordiv.innerHTML = "";

    let subjectName = document.forms["form"]["subject"].value;
    

    if (subjectName === '') {
        errordiv.style.visibility = 'visible';
        setErrorForTextFields("Название предмета", errordiv);        
        isValidate = false;
    }
    
    return isValidate;
}