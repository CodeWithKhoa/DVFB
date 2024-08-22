function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: defaultLanguage.key,
        includedLanguages: languages.map(item => item.key).toString(),
        autoDisplay: true,
    }, 'google_translate_element');
}
function fireEvent(element,event){
    // console.log("in Fire Event");
    if (document.createEventObject){
            // dispatch for IE
            // console.log("in IE FireEvent");
            let evt = document.createEventObject();
        return element.fireEvent('on'+event,evt)
    }
    else{
            // dispatch for firefox + others
            // console.log("In HTML5 dispatchEvent");
            let evt = document.createEvent("HTMLEvents");
            evt.initEvent(event, true, true ); // event type,bubbling,cancelable
            return !element.dispatchEvent(evt);
    }
}
function changeLanguage(lang) {
    let jObj = $('.goog-te-combo');
    let db = jObj.get(0);
    jObj.val(lang);
    fireEvent(db, 'change');

    let language = languages.find(item => item.key === lang)
    if (language) {
        changeIconLanuage(language)
    }
}
function resetTranslate(){
    // document.getElementById(":1.container").contentWindow.document.getElementById(":1.close").click()
    $('#\\:1\\.container').contents().find('#\\:1\\.restore').click();
    changeIconLanuage(defaultLanguage)
}
function changeIconLanuage(language) {
    $('.dropdown-language .dropdown-toggle span').html(language.name)
    $('.dropdown-language .dropdown-toggle img').attr("src", language.icon)
}
