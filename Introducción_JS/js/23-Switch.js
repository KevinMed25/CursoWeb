const metodoPago = "cheque";
//al parecer funciona como todos...
switch(metodoPago){
    case "tarjeta":
        console.log("pagaste con tarjeton");
        break;
    
    case "efectivo":
        console.log("pagaste con efectivo");
        break;
    
    case "cheque":
        console.log("aun alguien paga con eso?");
        break;
    
    case "otro":
        console.log("pagaste con otro metodo");
        break;
    
    default:
        console.log("No has pagado");
        break;
}