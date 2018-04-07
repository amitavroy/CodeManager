import expect from 'expect'

class TestUtils {
    see (text, wrapper) {
        expect(wrapper.html()).toContain(text);
    }
}

export default TestUtils
