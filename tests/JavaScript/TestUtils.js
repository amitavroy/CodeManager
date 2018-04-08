import expect from 'expect'

class TestUtils {
  see (text, wrapper) {
        expect(wrapper.html()).toContain(text);
    }
  divNotPresent (selector, wrapper) {
        expect(wrapper.find(selector).exists()).toBe(false)
    }
  click (selector, wrapper) {
    wrapper.find('.btn-primary').trigger('click')
  }
}

export default TestUtils
