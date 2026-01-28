function sum(...items) {
  if (items.length === 1 && Array.isArray(items[0])) {
    items = items[0];
  }

  return items.reduce((total, value) => total + value, 0);
}

console.log(sum(1, 2, 3, 4));   // 10
console.log(sum([1, 2, 3, 4])); // 10


const circle = {
  radius: 1,

  get area() {
    return Math.PI * this.radius * this.radius;
  }
};

circle.radius = 5;        
console.log(circle.area); 


function countOccurrences(array, searchElement) {
  if (!Array.isArray(array)) {
    throw new Error("Invalid array");
  }

  return array.reduce((count, element) => {
    return element === searchElement ? count + 1 : count;
  }, 0);
}

try {
  const numbers = [1, 2, 3, 4, 1];
  const count = countOccurrences(numbers, 1);
  console.log(count); // 2
} catch (error) {
  console.error(error.message);
}
