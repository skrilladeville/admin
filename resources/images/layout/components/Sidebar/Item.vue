<script>
export default {
  name: 'MenuItem',
  functional: true,
  props: {
    title: {
      type: String,
      default: ''
    },
    permission: {
      type: String,
      default: ''
    }
  },
  render(h, context) {
    const { title, permission } = context.props
    const vnodes = []

    if (title) {
      vnodes.push(title);
    }
    if (permission) {
      vnodes.push(permission);
    }
    return vnodes
  }
}
</script>
