export const checkQty= {
    checkQty(qty) {
        if(qty < 10 && qty > 0)
            return 'Low in stock'
        else if(qty === 0)
            return 'Out of stock'
        else
            return 'In stock'
    }
}
