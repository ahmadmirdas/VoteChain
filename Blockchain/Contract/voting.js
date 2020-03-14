import Web3 from 'web3'

const web3 = new Web3(window.web3.currentProvider)
const address = '0xAA5FCA06677299C2cd69dEDb584e497DF669514E';
const abi = [{ "constant": true, "inputs": [{ "name": "", "type": "uint256" }, { "name": "", "type": "uint256" }], "name": "suara", "outputs": [{ "name": "totalSuara", "type": "uint256" }], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [], "name": "Total", "outputs": [{ "name": "", "type": "uint256" }], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [{ "name": "tpsId", "type": "uint256" }, { "name": "kandidatId", "type": "uint256" }], "name": "vote", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }]

window.web3 = web3
window.vote = new web3.eth.Contract(abi, address)
console.log(window);
