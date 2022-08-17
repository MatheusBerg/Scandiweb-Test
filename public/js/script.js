document.getElementById('productType').onchange = function() {
    const DVDinput = document.querySelector(".size");
    const FURNITUREinput = document.querySelector(".dimension");
    const BOOKinput = document.querySelector(".weight");
    
    actions[productType.value.toLowerCase()](DVDinput, FURNITUREinput, BOOKinput);
} 

const actions = {
    dvd : (DVDinput, FURNITUREinput, BOOKinput) => {
        DVDinput.classList.remove("hide")
        FURNITUREinput.classList.add("hide") 
        BOOKinput.classList.add("hide")              
    },
    furniture: (DVDinput, FURNITUREinput, BOOKinput) => {
        FURNITUREinput.classList.remove("hide")
        DVDinput.classList.add("hide")
        BOOKinput.classList.add("hide")    
    },
    book: (DVDinput, FURNITUREinput, BOOKinput) => {
        BOOKinput.classList.remove("hide")
        FURNITUREinput.classList.add("hide")
        DVDinput.classList.add("hide")   
    },
}

const form = document.getElementById('product_form');
const sku = document.getElementById('sku');
const name = document.getElementById('name');
const price = document.getElementById('price');
const size = document.getElementById('size');
const height = document.getElementById('height');
const width = document.getElementById('width');
const length = document.getElementById('length');
const weight = document.getElementById('weight');
const productType = document.getElementById('productType');

form.addEventListener('submit', e => {
    const check = checkInputs();

    if (!check) {
        e.preventDefault();
    }
    
});

const setErrorFor = (input, message) => {    
    const inputControl = input.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
}

const setSuccessFor = (input) => {
    const inputControl = input.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
}

const isValidSku = (sku) => {
    const re = /^[a-zA-Z0-9]{7,100}$/;
    return re.test(String(sku).toLowerCase());
}

const isValidName = (name) => {
    const valid = (name.length >= 1 && name.length < 101) ? true : false;
    return valid;    
}

const isValidPrice =  (price) => {
    const re = /^\d+(?:[.]\d{0,2})?$/;
    return re.test(String(price).toLowerCase());
}

const isValidSize =  (size) => {
    const re =  /^[0-9]+$/;
    return re.test(String(size).toLowerCase());
}

const isValidHeight =  (height) => {
    const re =  /^[0-9]+$/;
    return re.test(String(height).toLowerCase());
}

const isValidWidth =  (width) => {
    const re =  /^[0-9]+$/;
    return re.test(String(width).toLowerCase());
}

const isValidLength =  (length) => {
    const re =  /^[0-9]+$/;
    return re.test(String(length).toLowerCase());
}

const isValidWeight =  (weight) => {
    const re =  /^[0-9]+$/;
    return re.test(String(weight).toLowerCase());
}

function checkInputs() {
    const skuValue = sku.value.trim();
    const nameValue = name.value.trim();
    const priceValue = price.value.trim();
    const sizeValue = size.value.trim();
    const heightValue = height.value.trim();
    const widthValue = width.value.trim();
    const lengthValue = length.value.trim();
    const weightValue = weight.value.trim();
    const productTypeValue = productType.value.trim();

    let errors = [];

    if(skuValue === '') {
        setErrorFor(sku, 'Please, submit required data');
        errors.push(true);  
    }else if (!isValidSku(skuValue)) {
        setErrorFor(sku, 'Please, provide the data of indicated type');
        errors.push(true);
    }else {
        setSuccessFor(sku);
    }

    if(nameValue === '') {
        setErrorFor(name, 'Please, submit required data');
        errors.push(true);
    }else if (!isValidName(nameValue)) {
        setErrorFor(name, 'Please, provide the data of indicated type');
        errors.push(true);
    }else {
        setSuccessFor(name);
    }

    if(priceValue === '') {
        setErrorFor(price, 'Please, submit required data');   
        errors.push(true);     
    }else if(!isValidPrice(priceValue)) {
        setErrorFor(price, "Please, provide the data of indicated type");
        errors.push(true);
    }else {
        setSuccessFor(price);
    }

    if(productTypeValue === 'DVD') {
        if(sizeValue === '') {
            setErrorFor(size, 'Please, submit required data');
            errors.push(true);
        }else if(!isValidSize(sizeValue)) {
            setErrorFor(size, "Not a valid size, please insert numbers for a valid size.");
            errors.push(true);
        }else {
            setSuccessFor(size);
        }
   
    } else if (productTypeValue === 'Furniture') {
        if(heightValue === '') {
            setErrorFor(height, 'Please, submit required data');
            errors.push(true);
        }else if(!isValidHeight(heightValue)) {
            setErrorFor(height, "Not a valid height, please insert numbers for a valid height.");
            errors.push(true);
        }else {
            setSuccessFor(height);
        }
    
        if(widthValue === '') {
            setErrorFor(width, 'Please, submit required data');
            errors.push(true);
        }else if(!isValidWidth(widthValue)) {
            setErrorFor(width, "Not a valid width, please insert numbers for a valid width.");
            errors.push(true);
        }else {
            setSuccessFor(width);
        }
    
        if(lengthValue === '') {
            setErrorFor(length, 'Please, submit required data');
            errors.push(true);
        }else if(!isValidLength(lengthValue)) {
            setErrorFor(length, "Not a valid length, please insert numbers for a valid length.");
            errors.push(true);
        }else {
            setSuccessFor(length);
        }

    } else if (productTypeValue === 'Book') {
        if(weightValue === '') {
            setErrorFor(weight, 'Please, submit required data');
            errors.push(true);
        }else if(!isValidWeight(weightValue)) {
            setErrorFor(weight, "Not a valid weight, please insert numbers for a valid weight.");
            errors.push(true);
        }else {
            setSuccessFor(weight);
        }

    } else if (productTypeValue === 'Select') {
        setErrorFor(productType, 'Please, submit required data');
        errors.push(true);
    }

    if (productTypeValue !== 'Select') {
        setSuccessFor(productType);
    }

    if (errors.includes(true)) {
        return false;
    } else {
        return true;
    }
    
}