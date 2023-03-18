options = form.selectSubject.options;



function updateSelect (string) {
    console.log("wd");
    for (let i = 0; i < options.length; i++) {
        options[i].setAttribute('style', 'display:block;')
        if (!options[i].text.includes(string)) {
            options[i].setAttribute('style', 'display:none;')
        }
        
    }
}