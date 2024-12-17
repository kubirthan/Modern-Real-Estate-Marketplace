//kubi = ibuk , madam = madam

function isPalidrome(str){
    function reversedString(str){
        let reversed = ''

        for(let i = str.length - 1; i>=0; i--){
            reversed+=str[i]
        }

        return reversed
    }

    const cleanedStr = str.toLowerCase()

    return cleanedStr === reversedString(cleanedStr)
}

console.log(isPalidrome('leve'));
