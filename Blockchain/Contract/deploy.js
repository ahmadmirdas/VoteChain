const HDWalletProvider = require('truffle-hdwallet-provider')
const Web3 = require('web3')
const Compile = require('./compile')
const END_POINT = 'https://rinkeby.infura.io/v3/4bb6adb8ead1470c8fc842300d1e5ca1'
const provider = new HDWalletProvider(
    'neither gorilla power album lunar lucky vital sponsor cool pair blood wave',
    END_POINT
);
const web3 = new Web3(provider)

const deploy = async () => {
    const accounts = await web3.eth.getAccounts()

    console.log('Attempting to deploy from account', accounts[0])
    console.log('Abi : ')
    console.log(JSON.stringify(Compile.abi));

    const result = await new web3.eth.Contract(Compile.abi)
        .deploy({ data: '0x' + Compile.evm.bytecode.object })
        .send({ gas: '2000000', from: accounts[0] })
    console.log('Contract deployed to', result.options.address)
    await process.exit(1);
};
deploy()
