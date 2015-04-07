    <!-- Instantiate Feather -->
var featherEditor = new Aviary.Feather({
    apiKey: 'eb93e1828b9047ab935402942f4b17e5',
    theme: 'light', // Check out our new 'light' and 'dark' themes!
    tools: 'all',
    appendTo: '',
    onSave: function (imageID, newURL) {
        var img = document.getElementById(imageID);
        img.src = newURL;

        // colocar a localização da imagem gerada
        // num campo hidden
        var hidden_input   = document.getElementById("polaroid_location");
        hidden_input.value = newURL;

        // fecha o editor
        featherEditor.close();
    },
    onError: function (errorObj) {
        alert(errorObj.message);
    }
});


    function launchEditor(id, src) {
    featherEditor.launch({
        image: id,
        url: src
    });
    return false;
}
