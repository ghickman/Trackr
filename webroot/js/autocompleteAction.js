$(document).ready(function(){
    $("#autoComplete").autocomplete("/~madnashua/tellann/tickets/autocomplete",{
        minChars: 2,
        cacheLength: 10,
        onItemSelect: selectItem,
        onFindValue: findValue,
        formatItem: formatItem,
        autoFill: false
    });
});

function selectItem(li) {
    findValue(li);
}

function findValue(li) {
    if(li == null) return alert("No match!");
    
    // If coming from an AJAX call, let's use the product id as the value
    if(!!li.extra) var sValue = li.extra[0];
    
    // otherwise, let's just display the value in the text box
    else var sValue = li.selectValue;
        alert("The value you selected was: " + sValue);
}

function formatItem(row) {
    if(row[1] == undefined) {
        return row[0];
    } else {
        return row[0] + "(id: " + row[1] + ")";
    }
}