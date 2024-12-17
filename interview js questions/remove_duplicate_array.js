//Example: Using Set
function removeDuplicate(arr){
   return [...new Set(arr)]
}






//example 3 : reduce
function removeDuplicates(arr) {
   return arr.reduce((unique, item) => {
        return unique.includes(item) ? unique : [...unique, item]
    }, [])
}

const array = [1,2,3,4,4,5,5]
console.log(removeDuplicates(array));