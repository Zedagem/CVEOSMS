var countryLists = new Array(4) 
countryLists["empty"] = ["Zone/City"]; 
countryLists["Addis Ababa"] = ["Addis Ababa"]; 
countryLists["Afar"] = ["Awsi Rasu", "Kilbet Rasu", "Gabi Rasu", "Hari", "Argobba"]; 
countryLists["Amhara"] = ["Agew Awi", "East Gojjam", "North Gondar", "Wag Hemra", "Bahir Dar "]; 
countryLists["Benishangul-Gummuz"]= ["Asosa", "Kamashi", "Metekel"];  
/* CountryChange() is called from the onchange event of a select element. 
* param selectObj - the select object which fired the on change event. 
*/ 
function countryChange(selectObj) { 
// get the index of the selected option 
var idx = selectObj.selectedIndex; 
// get the value of the selected option 
var which = selectObj.options[idx].value; 
// use the selected option value to retrieve the list of items from the countryLists array 
cList = countryLists[which]; 
// get the country select element via its known id 
var cSelect = document.getElementById("country"); 
// remove the current options from the country select 
var len=cSelect.options.length; 
while (cSelect.options.length > 0) { 
cSelect.remove(0); 
} 
var newOption; 
// create new options 
for (var i=0; i<cList.length; i++) { 
newOption = document.createElement("option"); 
newOption.value = cList[i];  // assumes option string and value are the same 
newOption.text=cList[i]; 
// add the new option 
try { 
cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE 
} 
catch (e) { 
cSelect.appendChild(newOption); 
} 
} 
} 
var countryLists = new Array(4) 
countryLists["empty"] = ["Zone/City"]; 
countryLists["Addis Ababa"] = ["Addis Ababa"]; 
countryLists["Afar"] = ["Awsi Rasu", "Kilbet Rasu", "Gabi Rasu", "Hari", "Argobba"]; 
countryLists["Amhara"] = ["Agew Awi", "East Gojjam", "North Gondar", "Wag Hemra", "Bahir Dar "]; 
countryLists["Benishangul-Gummuz"]= ["Asosa", "Kamashi", "Metekel"];  
/* CountryChange() is called from the onchange event of a select element. 
* param selectObj - the select object which fired the on change event. 
*/ 
function countryChange2(selectObj) { 
// get the index of the selected option 
var idx = selectObj.selectedIndex; 
// get the value of the selected option 
var which = selectObj.options[idx].value; 
// use the selected option value to retrieve the list of items from the countryLists array 
cList = countryLists[which]; 
// get the country select element via its known id 
var cSelect = document.getElementById("country2"); 
// remove the current options from the country select 
var len=cSelect.options.length; 
while (cSelect.options.length > 0) { 
cSelect.remove(0); 
} 
var newOption; 
// create new options 
for (var i=0; i<cList.length; i++) { 
newOption = document.createElement("option"); 
newOption.value = cList[i];  // assumes option string and value are the same 
newOption.text=cList[i]; 
// add the new option 
try { 
cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE 
} 
catch (e) { 
cSelect.appendChild(newOption); 
} 
} 
} 