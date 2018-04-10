@servers(['prime' => 'amitavroy@192.168.0.103', 'optimus' => '192.168.0.103'])

@task('connect', ['on' => $server])
cd .ssh
ls -la
cat authorized_keys
@endtask
