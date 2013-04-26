new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 4,
  interval: 30000,
  width: 265,
  height: 250,
  theme: {
    shell: {
      background: '#471e07',
      color: '#f7f7f7'
    },
    tweets: {
      background: '#fff',
      color: '#333',
      links: '#0084B4'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    behavior: 'all'
  }
}).render().setUser('casa_palacio').start();