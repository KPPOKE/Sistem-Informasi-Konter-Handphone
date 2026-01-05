/**
 * GadgetHub - Utility Functions
 * Contains helper functions for formatting and calculations
 */

/**
 * Format number to Indonesian Rupiah format
 * Property 1: Rupiah Formatting Consistency
 * Validates: Requirements 3.4
 * 
 * @param {number} number - The number to format
 * @returns {string} Formatted string starting with "Rp " followed by number with dot separators
 */
function formatRupiah(number) {
    if (number === null || number === undefined || isNaN(number)) {
        return 'Rp 0';
    }
    
    const num = Math.abs(Math.floor(number));
    const formatted = num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    
    return 'Rp ' + formatted;
}

/**
 * Get stock level classification
 * Property 2: Stock Level Classification
 * Validates: Requirements 7.3, 7.4, 8.2
 * 
 * @param {number} stock - The stock quantity
 * @returns {string} 'low' if stock < 5, 'medium' if 5 <= stock < 20, 'high' if stock >= 20
 */
function getStockLevel(stock) {
    if (stock === null || stock === undefined || isNaN(stock)) {
        return 'low';
    }
    
    const qty = Math.floor(stock);
    
    if (qty < 5) {
        return 'low';
    } else if (qty < 20) {
        return 'medium';
    } else {
        return 'high';
    }
}

/**
 * Calculate cart total
 * Property 3: Cart Total Calculation
 * Validates: Requirements 5.3
 * 
 * @param {Array} items - Array of cart items with price and qty properties
 * @returns {number} Sum of (price × quantity) for all items
 */
function calculateCartTotal(items) {
    if (!Array.isArray(items) || items.length === 0) {
        return 0;
    }
    
    return items.reduce((total, item) => {
        const price = parseFloat(item.price) || 0;
        const qty = parseInt(item.qty) || 0;
        return total + (price * qty);
    }, 0);
}

// ============================================
// PROPERTY-BASED TESTS
// Run these in browser console to verify correctness
// ============================================

/**
 * Property Test 1: formatRupiah
 * Feature: ui-redesign-modern, Property 1: Rupiah Formatting Consistency
 * Validates: Requirements 3.4
 * 
 * For any positive number, formatRupiah SHALL return a string starting with "Rp "
 * followed by the number formatted with Indonesian thousand separators (dots).
 */
function testFormatRupiah() {
    console.log('=== Property Test 1: formatRupiah ===');
    let passed = 0;
    let failed = 0;
    
    // Generate 100 random test cases
    for (let i = 0; i < 100; i++) {
        const num = Math.floor(Math.random() * 100000000); // 0 to 100 million
        const result = formatRupiah(num);
        
        // Property 1: Must start with "Rp "
        if (!result.startsWith('Rp ')) {
            console.error(`FAIL: formatRupiah(${num}) = "${result}" - does not start with "Rp "`);
            failed++;
            continue;
        }
        
        // Property 2: Removing "Rp " and dots should give original number
        const numPart = result.replace('Rp ', '').replace(/\./g, '');
        if (parseInt(numPart) !== num) {
            console.error(`FAIL: formatRupiah(${num}) = "${result}" - parsed back to ${numPart}`);
            failed++;
            continue;
        }
        
        passed++;
    }
    
    // Edge cases
    const edgeCases = [
        { input: 0, expected: 'Rp 0' },
        { input: 1000, expected: 'Rp 1.000' },
        { input: 1000000, expected: 'Rp 1.000.000' },
        { input: 19999000, expected: 'Rp 19.999.000' },
    ];
    
    edgeCases.forEach(({ input, expected }) => {
        const result = formatRupiah(input);
        if (result === expected) {
            passed++;
        } else {
            console.error(`FAIL: formatRupiah(${input}) = "${result}", expected "${expected}"`);
            failed++;
        }
    });
    
    console.log(`Results: ${passed} passed, ${failed} failed`);
    return failed === 0;
}

/**
 * Property Test 2: getStockLevel
 * Feature: ui-redesign-modern, Property 2: Stock Level Classification
 * Validates: Requirements 7.3, 7.4, 8.2
 * 
 * For any stock quantity:
 * - Returns "low" when stock < 5
 * - Returns "medium" when stock >= 5 AND stock < 20
 * - Returns "high" when stock >= 20
 */
function testGetStockLevel() {
    console.log('=== Property Test 2: getStockLevel ===');
    let passed = 0;
    let failed = 0;
    
    // Generate 100 random test cases
    for (let i = 0; i < 100; i++) {
        const stock = Math.floor(Math.random() * 1000);
        const result = getStockLevel(stock);
        
        let expected;
        if (stock < 5) expected = 'low';
        else if (stock < 20) expected = 'medium';
        else expected = 'high';
        
        if (result === expected) {
            passed++;
        } else {
            console.error(`FAIL: getStockLevel(${stock}) = "${result}", expected "${expected}"`);
            failed++;
        }
    }
    
    // Boundary cases
    const boundaryCases = [
        { input: 0, expected: 'low' },
        { input: 4, expected: 'low' },
        { input: 5, expected: 'medium' },
        { input: 19, expected: 'medium' },
        { input: 20, expected: 'high' },
        { input: 100, expected: 'high' },
    ];
    
    boundaryCases.forEach(({ input, expected }) => {
        const result = getStockLevel(input);
        if (result === expected) {
            passed++;
        } else {
            console.error(`FAIL: getStockLevel(${input}) = "${result}", expected "${expected}"`);
            failed++;
        }
    });
    
    console.log(`Results: ${passed} passed, ${failed} failed`);
    return failed === 0;
}

/**
 * Property Test 3: calculateCartTotal
 * Feature: ui-redesign-modern, Property 3: Cart Total Calculation
 * Validates: Requirements 5.3
 * 
 * For any cart containing items with price and quantity,
 * the total SHALL equal the sum of (price × quantity) for all items.
 */
function testCalculateCartTotal() {
    console.log('=== Property Test 3: calculateCartTotal ===');
    let passed = 0;
    let failed = 0;
    
    // Generate 100 random cart scenarios
    for (let i = 0; i < 100; i++) {
        const numItems = Math.floor(Math.random() * 10) + 1;
        const items = [];
        let expectedTotal = 0;
        
        for (let j = 0; j < numItems; j++) {
            const price = Math.floor(Math.random() * 20000000) + 10000; // 10k to 20M
            const qty = Math.floor(Math.random() * 10) + 1; // 1 to 10
            items.push({ price, qty });
            expectedTotal += price * qty;
        }
        
        const result = calculateCartTotal(items);
        
        if (result === expectedTotal) {
            passed++;
        } else {
            console.error(`FAIL: calculateCartTotal returned ${result}, expected ${expectedTotal}`);
            failed++;
        }
    }
    
    // Edge cases
    const emptyResult = calculateCartTotal([]);
    if (emptyResult === 0) {
        passed++;
    } else {
        console.error(`FAIL: calculateCartTotal([]) = ${emptyResult}, expected 0`);
        failed++;
    }
    
    const singleItem = calculateCartTotal([{ price: 1000000, qty: 2 }]);
    if (singleItem === 2000000) {
        passed++;
    } else {
        console.error(`FAIL: calculateCartTotal([{price:1000000, qty:2}]) = ${singleItem}, expected 2000000`);
        failed++;
    }
    
    console.log(`Results: ${passed} passed, ${failed} failed`);
    return failed === 0;
}

/**
 * Run all property tests
 */
function runAllPropertyTests() {
    console.log('========================================');
    console.log('Running Property-Based Tests');
    console.log('========================================\n');
    
    const results = {
        formatRupiah: testFormatRupiah(),
        getStockLevel: testGetStockLevel(),
        calculateCartTotal: testCalculateCartTotal()
    };
    
    console.log('\n========================================');
    console.log('Summary:');
    Object.entries(results).forEach(([name, passed]) => {
        console.log(`  ${name}: ${passed ? '✓ PASSED' : '✗ FAILED'}`);
    });
    console.log('========================================');
    
    return Object.values(results).every(r => r);
}

// Export for use in other scripts
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        formatRupiah,
        getStockLevel,
        calculateCartTotal,
        runAllPropertyTests
    };
}
