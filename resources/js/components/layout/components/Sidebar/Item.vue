<script>
export default {
  name: 'MenuItem',
  functional: true,
  props: {
    title: {
      type: String,
      default: ''
    }
  },
  render(h, context) {
    const { title } = context.props
    const vnodes = []

    if (title) {
      vnodes.push(title);
    }
    return vnodes
  }
}
</script>
